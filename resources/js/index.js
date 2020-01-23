import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './Default';
import {Provider} from 'react-redux';
import store from './store';
import { BrowserRouter as Router } from 'react-router-dom';

if (document.getElementById('react-app')) {
    ReactDOM.render(    
    <Provider store={store} >
      <Router>
        <App />
      </Router>
    </Provider>
    , document.getElementById('react-app'));
  }
  
