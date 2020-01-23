import {createStore, applyMiddleware} from 'redux';
import {combineReducers} from 'redux';
import * as reducers from './reducers';
import thunkMiddleware from 'redux-thunk';
import {composeWithDevTools} from 'redux-devtools-extension/logOnlyInProduction';

// instancier le store

const appReducer = combineReducers(reducers);
let middleware = [thunkMiddleware];

        //composeWithDevTools pour utiliser l'extension du navigateur redux devtools et voir l'etat de l'application
        // Nécessite installation de l'extension sur navigateur
const store = createStore(appReducer, composeWithDevTools(
    applyMiddleware(...middleware)
));

//fonction pour injecter des reducers

store.asyncReducers = {};

const createInjectReducer = store => (key,reducer) => {
    store.asyncReducers[key] = reducer;
    store.replaceReducer(combineReducers({...combineReducers, ...store.asyncReducers}))
}

export const injectReducer = createInjectReducer(store);

export default store;
