export default {
    'name': 'Estudiante',
    'routes': {
        index: () => ('students.index'),
        create: () => ('students.create'),
        store: () => ('students.store'),
        edit: (id) => ('students.edit', id),
        update: (id) => ('students.update', id),
        delete: (id) => ('students.delete', id),
    }
};