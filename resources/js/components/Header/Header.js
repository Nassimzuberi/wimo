import React,{ Component } from "react";
import { Link, NavLink } from "react-router-dom";
import { connect } from "react-redux";
import '../../features/cart/store';


class Header extends Component {
    render() {
        return (
            <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                <Link className='navbar-brand' to="/">Wimo</Link>
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarNav">
                    <ul className="navbar-nav ml-auto">
                        <li className="nav-item"><NavLink className="nav-link" to="/" activeClassName="active">Home</NavLink></li>
                        <li className="nav-item"><a href="/login" className="nav-link">Connexion</a></li>
                        <li className="nav-item"><a href="/register" className="nav-link">Inscription</a></li>
                        <li className="nav-item">
                            <div className="dropdown">
                                <div className="btn dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i className="fas fa-shopping-cart"></i> <span className="badge badge-danger">{this.props.cartlength}</span>
                                </div>
                                <div className="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    {this.props.cart.data.map((t,i) => (
                                        <>
                                        <div key={i} className="m-2"> {t.quantityCart} x {t.name}</div>
                                        <hr className="w-100" />
                                        </>
                                    ))}
                                    <div className="text-center">Total : {this.props.total} €<br />
                                    <NavLink to="/cart">Voir le panier</NavLink>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        )
    }
}

export default connect(state => {
    let cart = state.cart;
    let total = state.cart.total;
    let cartlength = state.cart.data.length;
    return {cartlength,cart,total}
})(Header);