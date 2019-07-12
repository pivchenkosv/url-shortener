import React from 'react';
import ReactDOM from 'react-dom';

import createStore from './main/store/index'
import {Provider} from "react-redux";
import App from "./main/components/app";

const store = createStore();

const Root = (
    <Provider store={store}>
        <App />
    </Provider>
);

ReactDOM.render(Root, document.getElementById('app'));
