let form = document.querySelector('#calendarFrm');

let calendarEl = document.getElementById('calendar');

let calendar = new Calendar(calendarEl, {
    locale: esLocale,
    plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
    headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },

    eventSources: {
        url: "http://127.0.0.1:8000/admin/calendar/show",
        method: "POST",
        color: "#C378CD",
        extraParams: {
            _token: form._token.value,
        }
    },

    dateClick: function (info) {
        form.reset();
        form.start.value = info.dateStr;
        form.end.value = info.dateStr;

        $("#event").modal("show");
    },

    eventClick:function (info){
        axios.post("http://127.0.0.1:8000/admin/calendar/display/"+info.event.id)
            .then((response) => {
                document.getElementById('show-id').value = response.data.id;
                document.getElementById('show-user_id').value = response.data.user_id;
                document.getElementById('show-start').value = moment(response.data.start).format('YYYY-MM-DD');
                document.getElementById('show-end').value = moment(response.data.end).format('YYYY-MM-DD');
                document.getElementById('show-start-hour').value = response.data.startHour;
                document.getElementById('show-end-hour').value = response.data.endHour;
                $("#display").modal("show");
            })
    }
});

calendar.render();

document.getElementById('btnGuardar').addEventListener('click',function () {
    const data = new FormData(form);
    console.log(data);

    //Crear el evento
    axios.post("http://127.0.0.1:8000/admin/calendar/create", data)
        .then((response) => {
            calendar.refetchEvents();
            $("#event").modal("hide");
        })
        .catch(error=> {
            if(error.response) {
                console.log(error.response.data);
            }
        })
});

document.getElementById('btnElminar').addEventListener('click',function (info) {
    const data = new FormData(form);
    console.log(data);

    //Eliminar evento
    axios.post("http://127.0.0.1:8000/admin/calendar/destroy/"+document.getElementById('show-id').value,data)
        .then((response) => {
            calendar.refetchEvents();
            $("#display").modal("hide");
        })
        .catch(
            error=>{
                if(error.response){
                    console.log(error.response.data);
                }
            }
        )
});

