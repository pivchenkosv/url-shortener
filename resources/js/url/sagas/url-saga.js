import { takeLatest, call, put } from 'redux-saga/effects';
import {createUrlAction} from "../actions/url-actions";
import {loadUrlById} from "../api/url";


function * createUrlEffectSaga(action)
{
    try {
        console.log('saga2')
        let { data } = yield call(loadUrlById, action);
        yield put(createUrlAction(data.data));
    } catch (e) {
        console.log(e)
    }
}

export function * createUrlWatcherSaga()
{
    console.log('saga');
    yield takeLatest('CREATE_URL', createUrlEffectSaga);
}
