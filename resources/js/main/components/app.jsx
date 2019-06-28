import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Link, Switch} from "react-router-dom";
import Home from "../../home/components/home";
import cx from 'classnames';
import globalStyles from '../../../../node_modules/bootstrap/dist/css/bootstrap.css'

import Header from "../../shared/header/components/header";

export default class App extends Component {

    render() {

        return (
            <BrowserRouter>
                <Header />
                <div className="container justify-content-center d-flex mt-5">
                    <Switch>
                        <Route exact path='/urls' component={Home}/>
                        <Route path='/urls/:url' component={Home}/>
                    </Switch>
                </div>
            </BrowserRouter>
        );
    }
}
