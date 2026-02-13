
export default {
    'name': 'Projecto',
    'routes': {
        index: () => ('projects.index'),
        create: () => ('projects.create'),
        store: () => ('projects.store'),
        edit: (id) => ('projects.edit', id),
        update: (id) => ('projects.update', id),
        delete: (id) => ('projects.delete', id),
    },

};