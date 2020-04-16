import React from 'react';
import ReactDOM from 'react-dom';
import TopSales from "./TopSales";


if (document.getElementById('top')) {
    ReactDOM.render(<TopSales />, document.getElementById('top'));
}

