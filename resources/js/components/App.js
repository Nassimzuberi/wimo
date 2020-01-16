import React, { Component } from 'react';
import {Header,Search, Product,Cart} from './components';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import axios from 'axios';
import { connect } from 'react-redux';


class App extends Component {
  constructor(){
    super();
    this.state = {
      sells : [],
      selectedSell : 0,
      position: [51.505,-0.09],
      zoom: 15,
      loaded:false,
   
    }
    this.selectSell = (index) => {
      index -= 1;
      let selectedSell = index;
      this.setState({ 
        selectedSell,
        position : [this.state.sells[index].lat,this.state.sells[index].long]
      })
    }
  
  }
  
  componentDidMount(){
    axios.get('/produit').then(response => {
      this.setState({sells : response.data, loaded:true});
    }).catch(errors=>{
      console.log(errors)
    })

  }

  render() {
    return (
      <Router>
        <Header />
        <Switch>
          <Route path="/product" render={() => <Product {...this.state} selectSell={this.selectSell} />} />
          <Route path="/connexion" render={() => (
            <div>Salut</div>
          )}/>
          <Route path="/cart" component={Cart} /> } />
          <Route render={() => (
            <>
            <Search />
            <div>{this.state.loaded ? 'C\'est bon' : 'Aucune'}</div>
            </>
          )} />
        </Switch>
        
      </Router>
      
      
    )
  }
}
export default App;