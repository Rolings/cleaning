import {DateTime} from 'luxon';

class Calendar {
    constructor(selector, options = {}) {
        this.el = document.querySelector(selector);
        this.options = options;
        this.locale = options.locale || 'en-US';
        this.timezone = options.timezone || 'utc';
        this.startWeekOn = options.startWeekOn === 'sunday' ? 0 : 1;
        this.current = this.getDateInTimezone(new Date());
        this.viewDate = this.current;
        this.selected = options.defaultDate
            ? DateTime.fromISO(options.defaultDate, { zone: this.timezone }).startOf('day')
            : null;
        this.render();
    }

    getDateInTimezone(dateLike) {
        const date = typeof dateLike === 'string' || typeof dateLike === 'number'
            ? new Date(dateLike)
            : new Date(dateLike.getTime());

        return DateTime.fromJSDate(date, {zone: 'utc'}).setZone(this.timezone);
    }

    /**
     *
     */
    render() {
        this.el.innerHTML = '';

        const calendar = document.createElement('div');
        calendar.className = 'calendar';

        // Header
        const header = document.createElement('div');
        header.className = 'calendar-header mb-2 mt-2 pl-5 pr-5';

        const prevBtn = document.createElement('span');
        prevBtn.className = 'btn btn-sm  prev';
        prevBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">\n' + '  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>\n' + '</svg>';
        prevBtn.onclick = () => this.changeMonth(-1);

        const monthLabel = document.createElement('strong');
        monthLabel.className = 'month-label mb-3';

        const nextBtn = document.createElement('span');
        nextBtn.className = 'btn btn-sm next';
        nextBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">\n' + '  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>\n' + '</svg>';
        nextBtn.onclick = () => this.changeMonth(1);

        const todayBtn = document.createElement('span');
        todayBtn.className = 'btn-global';
        todayBtn.textContent = 'Today';
        todayBtn.onclick = () => this.resetToToday();

        header.append(prevBtn, monthLabel, nextBtn);
        calendar.appendChild(header);

        this.monthLabel = monthLabel;

        // Weekdays
        const weekDays = document.createElement('div');
        weekDays.className = 'calendar-grid week-days mb-2';

        const weekDaysNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const weekStart = this.startWeekOn;
        const weekDaysOrdered = [...weekDaysNames.slice(weekStart), ...weekDaysNames.slice(0, weekStart)];

        weekDaysOrdered.forEach(day => {
            const div = document.createElement('div');
            div.className = 'text-center fw-bold';
            div.textContent = day;
            weekDays.appendChild(div);
        });
        calendar.appendChild(weekDays);

        // Days
        const daysGrid = document.createElement('div');
        daysGrid.className = 'calendar-grid days pl-3 pr-3 mb-4';
        this.daysGrid = daysGrid;
        calendar.appendChild(daysGrid);

        this.el.appendChild(calendar);

        this.update();
    }

    /**
     *
     */
    update() {
        const year = this.viewDate.year;
        const month = this.viewDate.month;
        const firstDay = DateTime.fromObject({year, month, day: 1}, {zone: this.timezone});
        const startDay = (firstDay.weekday % 7 - this.startWeekOn + 7) % 7;
        const daysInMonth = firstDay.daysInMonth;

        const today = DateTime.now().setZone(this.timezone).startOf('day');
        const todayTime = today.toMillis();

        const blockedDates = (this.options.blockedDates || []).map(d =>
            DateTime.fromISO(d, {zone: this.timezone}).startOf('day').toMillis()
        );

        const isBeforeToday = d => d < todayTime;
        const isBlocked = d => blockedDates.includes(d);

        this.monthLabel.textContent = this.viewDate.toFormat('MMMM yyyy');

        this.daysGrid.innerHTML = '';

        for (let i = 0; i < startDay; i++) {
            this.daysGrid.appendChild(document.createElement('div'));
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const date = DateTime.fromObject({year, month, day}, {zone: this.timezone});
            const time = date.toMillis();

            const div = document.createElement('div');
            div.className = 'calendar-day';
            div.textContent = day;

            const isDisabled = isBeforeToday(time);
            const isBlockedDay = isBlocked(time);
            const isToday = time === todayTime;
            const isSelected = this.selected && time === this.selected.startOf('day').toMillis();

            if (isToday) div.classList.add('today');
            if (isSelected) div.classList.add('selected');
            if (isBlockedDay) div.classList.add('blocked');
            if (isDisabled) div.classList.add('disabled');

            if (!isBlockedDay && !isDisabled) {
                div.classList.add('active');
                div.onclick = () => {
                    this.selected = date;
                    this.options.onDateSelect?.({
                        date: this.selected.toFormat('yyyy-MM-dd')
                    });
                    this.update();
                };
            }

            this.daysGrid.appendChild(div);
        }

        this.options.onMonthChange?.(firstDay.toJSDate());
    }


    /**
     *
     * @param delta
     */
    changeMonth(delta) {
        this.viewDate = this.viewDate.plus({months: delta});
        this.update();
    }

    /**
     *
     */
    resetToToday() {
        this.viewDate = this.current;
        this.update();
        this.options.onTodayClick?.(this.current);
    }
}

window.Calendar = Calendar;
