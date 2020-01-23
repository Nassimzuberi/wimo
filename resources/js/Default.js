import React, { Component } from 'react';
import bioCart from './features/cart';
import Header from './components/Header/Header'
import { BrowserRouter as Router, Switch, Route, Redirect } from 'react-router-dom';
import axios from 'axios';
import Loadable from 'react-loadable';
import '../../features/cart/store';

const LazyProduct = Loadable({
  loader: () => import('./features/product'),
  loading: () => <h1>Loading ...</h1>
})
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
      <>
        <Header />
        <Switch>
          <Route path="/product" render={() => <LazyProduct {...this.state} selectSell={this.selectSell} />} />
          <Route path="/cart" component={bioCart} /> } />
          <Redirect to="/product" />
        </Switch>
        </>

    )
  }
}
export default App;
