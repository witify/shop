<template>
    <v-data-table url="/dev/page">
        <template slot-scope="props">
            <b-table-column field="id" label="ID" width="40" sortable>
                {{ props.row.id }}
            </b-table-column>

            <b-table-column field="title" label="Title" sortable>
                {{ props.row.title[$laravel.app.locale] }}
            </b-table-column>

            <b-table-column field="name" label="Name" sortable>
                {{ props.row.name }}
            </b-table-column>

            <b-table-column field="slug" label="Slug" sortable>
                {{ props.row.slug[$laravel.app.locale] }}
            </b-table-column>
        </template>
    </v-data-table>
</template>

