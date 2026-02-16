export default {
    'name': 'Profesor',
    'routes': {
        index: () => ('teachers.index'),
        create: () => ('teachers.create'),
        store: () => ('teachers.store'),
        edit: (id) => ('teachers.edit', id),
        update: (id) => ('teachers.update', id),
        delete: (id) => ('teachers.delete', id),
    }
};