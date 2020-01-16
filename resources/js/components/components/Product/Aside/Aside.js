import React from 'react';
import SellList from './SellList/SellList';
import { Route, Switch, Link } from 'react-router-dom';
import SellDetails from './SellDetails/SellDetails';


export default class Aside extends React.Component {
    render(){
        return (
            <>
            
            <div className="input-group m-3">
                
                <Link to="/product" className="border px-2"><i className="fas fa-arrow-left fa-2x"></i></Link>
                <input type="text" className="form-control ml-2" placeholder="Search..."   />
                <div className="input-group-append">
                <button className="btn btn-outline-secondary" type="button">Enter</button>
                </div>
            </div>
            <hr className="w-100"></hr>
            <Switch>
                <Route exact path="/product" render={() => <SellList {...this.props} />} />
                <Route exact path="/product/:id" render={() => <SellDetails sells={this.props.sells} />} />
            </Switch>
            
            </>
        )
    }
}