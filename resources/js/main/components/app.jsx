import React, {Component} from 'react';
import {BrowserRouter, Route, Switch} from "react-router-dom";
import Home from "../../url/containers/home-container";
import cx from 'classnames';
import globalStyles from '../../../../node_modules/bootstrap/dist/css/bootstrap.css'

import Header from "../../shared/header/components/header";
import RedirectOriginal from "../../url/components/redirect";

class App extends Component {

    render() {
        return (
            <BrowserRouter>
                <Header />
                <div className="container justify-content-center d-flex mt-5">
                    <Switch>
                        <Route path='/:code' component={RedirectOriginal}/>
                        <Route exact path='/' component={Home}/>
                        <Route exact path='/urls' component={Home}/>
                        <Route path='/urls/:url' component={Home}/>
                    </Switch>
                </div>
            </BrowserRouter>
        );
    }
}

export default App
