import React, {Component} from "react";
import {Link} from "react-router-dom";

import "./header.scss"

class Header extends Component {

    render() {
        return (
            <div className="header">
                <Link to="/urls">Url Shortener</Link>
                <div className='navlinks'>
                    <div className='navlink'>
                        <Link to="/about">About</Link>
                    </div>
                    <div className='navlink'>
                        <Link to="/contacts">Contacts</Link>
                    </div>
                </div>
            </div>
        );
    }
}

export default Header
