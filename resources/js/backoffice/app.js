import 'alpinejs';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import esLocale from '@fullcalendar/core/locales/es';

window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js').default;
window.BMaterialDesign = require('bootstrap-material-design');
window.Swal = require('sweetalert2');

window.PS = require('./theme/js/plugins/perfect-scrollbar.jquery.min');
window.Moment = require('moment');
window.Swal = require('sweetalert2');
window.JQV = require('./theme/js/plugins/jquery.validate.min');
window.JBW = require('./theme/js/plugins/jquery.bootstrap-wizard');
window.BootstrapSelectpicker = require('./theme/js/plugins/bootstrap-selectpicker');
window.BootstrapDatepicker = require('./theme/js/plugins/bootstrap-datetimepicker.min');
window.Tagsinput = require('./theme/js/plugins/bootstrap-tagsinput');
window.Jasny = require('./theme/js/plugins/jasny-bootstrap.min');
window.Calendar = Calendar;
window.dayGridPlugin = dayGridPlugin;
window.timeGridPlugin = timeGridPlugin;
window.listPlugin = listPlugin;
window.interactionPlugin = interactionPlugin;
window.esLocale = esLocale;
window.jvectormap = require('./theme/js/plugins/jquery-jvectormap');
window.nouislider = require('./theme/js/plugins/nouislider.min');
window.arrive = require('./theme/js/plugins/arrive.min');
window.chartist = require('./theme/js/plugins/chartist.min');
window.notify = require('./theme/js/plugins/bootstrap-notify');

require('./theme/js/material-dashboard.min');
require('./validations');

// bootstrap
require('../app');
// Boilerplate
require('../plugins');
