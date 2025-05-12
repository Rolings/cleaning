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
            const dateStr = selectInfo.startStr;

            return !blockedDates.includes(dateStr);
        },
        select: function(info) {
            callback({
                dateStr: info.startStr,
                date: info.start
            });
        },
        events: blockedDates.map(date => {
            const endDate = new Date(date);
            endDate.setDate(endDate.getDate() + 1);

            return {
                start: date,
                end: endDate.toISOString().split('T')[0],
                allDay: true,
                display: 'background',
                color: '#f45a5a',
                overlap: false
            };
        }),
    });

    calendar.render();
};

