import React from 'react';
import { Link } from 'react-router-dom';

const SearchBar = () => {
    return (
        <div className="input-group m-3">
            <input type="text" className="form-control ml-2" placeholder="Search..."   />
            <div className="input-group-append">
            <Link className="btn btn-outline-secondary" to="/product">Enter</Link>
            </div>
        </div>
    ) 
    
};

export default SearchBar;