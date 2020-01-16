import {createStore} from 'redux';
import {combineReducers} from 'redux';
import * as reducers from './reducers';

const productReducer = combineReducers(reducers);

const store = createStore(productReducer);
export default store;