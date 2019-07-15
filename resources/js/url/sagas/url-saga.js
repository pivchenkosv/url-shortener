import {takeLatest, call, put, all} from 'redux-saga/effects';
import {putUrlAction} from "../actions/url-actions";
import {createShortUrl, loadUrlByCode, loadUrlById} from "../api/url";
import {addNotification} from "../../shared/notification/actions/notification-actions";


function* loadUrlEffectSaga(action) {
    try {
        let {data} = yield call(loadUrlById, action.payload);
        yield put(putUrlAction(data.data));

        const info = document.getElementById('info');
        info.className = 'my-3 info info-shown';
    } catch (e) {
        action.payload.history.push('/')
        yield put(addNotification('Url was not found. Create a new one!'));
        console.log(e)
    }
}

function* redirectEffectSaga(action) {
    try {
        let {data} = yield call(loadUrlByCode, action.payload);
        window.location.assign(data.data.original_url);
    } catch (e) {
        console.log('catch')
        action.payload.history.push('/')
        yield put(addNotification('Url was not found. Create a new one!'))
        console.log(e)
    }
}

function* createUrlEffectSaga(action) {
    try {
        let {data} = yield call(createShortUrl, action.payload);
        yield put(putUrlAction(data.data));

        const info = document.getElementById('info');
        info.className = 'my-3 info info-shown';
    } catch (e) {
        console.log(e)
    }
}

export function* loadUrlWatcherSaga() {
    yield all([
        yield takeLatest('LOAD_URL', loadUrlEffectSaga),
        yield takeLatest('CREATE_URL', createUrlEffectSaga),
        yield takeLatest('REDIRECT', redirectEffectSaga),
    ]);

}
