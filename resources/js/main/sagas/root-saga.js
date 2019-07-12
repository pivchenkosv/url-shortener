import {all} from 'redux-saga/effects';
import {createUrlWatcherSaga} from "../../url/sagas/url-saga";


// import watchers from other files

export default function * rootSaga()
{
    yield all([
        createUrlWatcherSaga()
        // add other watchers to the array
    ]);
}
