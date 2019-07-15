import React, {Component} from 'react';
import {BrowserRouter, Route, Switch} from "react-router-dom";
import Home from "../../url/containers/home-container";
import cx from 'classnames';
import globalStyles from '../../../../node_modules/bootstrap/dist/css/bootstrap.css'

import Header from "../../shared/header/containers/header-container";
import RedirectOriginal from "../../url/containers/redirect-container";
import Notification from "../../shared/notification/containers/notification-container";

class App extends Component {

    render() {
        return (
            <BrowserRouter>
                <Notification />
                <Header />
                <div className="container justify-content-center d-flex mt-5">
                    <Switch>
                        <Route exact path='/' component={Home}/>
                        <Route path='/urls/:url' component={Home}/>
                        <Route exact path='/urls' component={Home}/>
                        <Route path='/:code' component={RedirectOriginal}/>
                    </Switch>
                </div>
            </BrowserRouter>
        );
    }
}

export default App
