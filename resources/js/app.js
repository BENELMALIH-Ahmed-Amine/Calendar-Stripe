import axios from 'axios';
import './bootstrap';

import Alpine, { data } from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', async function () {
    let response = await axios.get('/calendar/get-course');
    let courses = response.data.events
    
    // let newDate = new Date();


    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        //? will normally be on the left. if RTL, will be on the right
        headerToolbar: {
            start: 'timeGridDay,timeGridWeek,dayGridMonth listWeek',
            center: 'title',
            end: 'prevYear prev today next nextYear',

            //? Dosen't work!
            // views: {
            //     timeGridDay: {
            //         buttonText: 'Day'
            //     },
            //     dayGridWeek: {
            //         buttonText: 'Week'
            //     },
            //     dayGridMonth: {
            //         buttonText: 'Month'
            //     },
            //     listWeek: {
            //         buttonText: 'List shihaja'
            //     }
            // }
        },
        initialView: 'timeGridWeek',
        businessHours: [
            {   // AM
                dow: [6, 7], // Monday, Tuesday, Wednesday
                start: '08:00:00', // 8am
                end: '11:00:00' // 11am
            },
            {   // PM
                dow: [6, 7], // Monday, Tuesday, Wednesday
                start: '13:00:00', // 1pm
                end: '23:00:00' // 11pm
            }
        ],
        nowIndicator: true,
        selectable: true,
        selectMirror: true,
        selectOverlap: false,
        hiddenDays: [2, 3, 4],
        events: courses,
        // selectAllow: (info) => {
        //     return info.start >= newDate
        // },
        select: (info) => {
            let startTime = info.startStr.slice(0, info.startStr.length - 6)
            let endTime = info.endStr.slice(0, info.endStr.length - 6)

            storeStart.value = startTime
            storeEnd.value = endTime

            submitBtn.click()

            console.log(startTime);
        },
        // eventClick: (info) => {
        //     let ownerId = info
        //     console.log(ownerId);
            
        //     deleteCourse.action = `/calendar/course/destroy/${calendar}`
        // },
    });
    calendar.render();
});