export default {
    'name': 'Usuario',
    'routes': {
        index: () => ('users.index'),
        create: () => ('users.create'),
        store: () => ('users.store'),
        edit: (id) => ('users.edit', id),
        update: (id) => ('users.update', id),
        delete: (id) => ('users.delete', id),
    }
};