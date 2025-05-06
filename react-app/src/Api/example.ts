import { createApi, fetchBaseQuery } from "@reduxjs/toolkit/query/react";

export const exampleApi = createApi({
    reducerPath: "example",
    baseQuery: fetchBaseQuery({
        baseUrl: pluginData.api.endpoints.example,
    }),
    // tagTypes: [],
    endpoints: (builder) => ({
        getExample: builder.query({
            query: ({ header, description }) => ({
              url: '',
              params: { header, description },
            }),
            // invalidatesTags: [""]
          }),
        postExample: builder.mutation({
            query: ( data : Object ) => ({
                url: '',
                method: 'POST',
                body: data,
            }),
            // providesTags: [""]
        }),
    }),
});

export const {
    useGetExampleQuery,
    usePostExampleMutation
} = exampleApi;