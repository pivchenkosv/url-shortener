import { createAction } from 'redux-actions';

export const loadUrlSagaAction = createAction(
    'LOAD_URL',
    (id, history)=> ({id, history})
)
export const createUrlSagaAction = createAction(
    'CREATE_URL',
    originalUrl => ({originalUrl})
)
export const redirectSagaAction = createAction(
    'REDIRECT',
    (code, history) => ({code, history})
)
export const putUrlAction = createAction(
    'PUT_URL',
    url => ({url})
)
