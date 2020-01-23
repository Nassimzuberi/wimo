import React from 'react';
import {default as Cart} from './components/Cart';
import { Switch, Redirect,Route } from 'react-router-dom';
import {default as PayementOption} from './components/PayementOption';

const bioCart = () => {
    return (
        <Switch>
            <Route exact path="/cart" component={Cart}/>
            <Route exact path="/cart/validation" component={PayementOption}/>
        </Switch>
    )
}
export default bioCart;