/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
	
	
	/* Datetimepicker Init*/
	$('#datetimepicker1').datetimepicker({
		useCurrent: false,
		format: 'YYYY-MM-DD',
		icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
	}).data("DateTimePicker").date(moment());

	$('#datetimepicker2').datetimepicker({
		useCurrent: false,
		format: 'YYYY-MM-DD',
		icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
	}).data("DateTimePicker").date(moment());
});