import React from 'react';
import ReactDOM from 'react-dom';
import TopSales from "./TopSales";
import SendTicket from "./SendTicket";


if (document.getElementById('top')) {
    ReactDOM.render(<TopSales />, document.getElementById('top'));
}


if (document.getElementById('sendticket')) {
    ReactDOM.render(<SendTicket />, document.getElementById('sendticket'));
}
