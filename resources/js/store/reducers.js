import {sessionReducer} from 'redux-react-session';

export const auth = (state = {isLoggedin : false}, action) => {
    return state;
}

export const session = sessionReducer;