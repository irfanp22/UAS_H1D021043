import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import '@fortawesome/fontawesome-free/js/all.js';
import jQuery from 'jquery';
window.$ = jQuery;
import DataTables from 'datatables.net-dt';
window.DataTable = DataTables;

window.styling = function () {
    $('#tasks').addClass('border border-gray-200');
    $('#tasks_wrapper').addClass('bg-white');
    $('#tasks_length').addClass('bg-white px-4 py-3 border-b border-gray-200');
    $('#tasks_length label').addClass('flex items-center justify-start text-gray-900');
    $('#tasks_length select').addClass('mt-1 block w-24 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300');
    $('#tasks_filter').addClass('bg-white px-4 py-3');
    $('#tasks_filter label').addClass('flex items-center text-gray-900');
    $('#tasks_filter input[type="search"]').addClass('mt-1 block w-200 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300');
    $('.dataTables_info').addClass('text-sm text-gray-700 bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between');
    $('#tasks_paginate').addClass('bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-end');
    $('#tasks_previous').addClass('bg-indigo-500 hover:bg-indigo-600 text-gray-900 px-4 py-2 rounded-md mr-2');
    $('.paginate_button').addClass('bg-indigo-500 hover:bg-indigo-600 text-gray-900 px-4 py-2 rounded-md mr-2')
    $('#tasks_next').addClass('bg-indigo-500 hover:bg-indigo-600 text-gray-900 px-4 py-2 rounded-md mr-2');
}