import { createAction } from 'redux-actions';

export const createUrlAction = createAction(
    'CREATE_URL',
    id => ({id})
)
