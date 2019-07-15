import {all} from 'redux-saga/effects';

import {loadUrlWatcherSaga} from "../../url/sagas/url-saga";
import {notificationWatcherSaga} from "../../shared/notification/sagas/notification-saga";
// import watchers from other files

export default function * rootSaga()
{
    yield all([
        loadUrlWatcherSaga(),
        notificationWatcherSaga()
        // add other watchers to the array
    ]);
}
