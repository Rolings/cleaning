import {Calendar} from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

window.FullCalendar = {
    Calendar, dayGridPlugin, interactionPlugin
};


window.initCalendar = (elementId, callback, blockedDates = []) => {
    const calendarEl = document.getElementById(elementId);
    if (!calendarEl) return;

    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        selectable: true,
        selectMirror: true,
        unselectAuto: true,
        validRange: {
            start: new Date().toISOString().split('T')[0]
        },
        selectAllow: function (selectInfo) {
            const start = selectInfo.start;
            const end = selectInfo.end;
            const diffInMs = end - start;
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);
            return diffInDays <= 1;
        },
        dateClick: function (info) {
            callback(info);
        },
        dayCellDidMount: function (arg) {
            const dateStr = arg.date.toISOString().split('T')[0];

            if (blockedDates.includes(dateStr)) {
                arg.el.style.backgroundColor = '#f8d7da';
                arg.el.style.color = '#721c24';
                arg.el.style.cursor = 'not-allowed';
            }
        },
    });

    calendar.render();
};

