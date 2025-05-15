import { createApi, fetchBaseQuery } from "@reduxjs/toolkit/query/react";

export const exampleApi = createApi({
    reducerPath: "example",
    baseQuery: fetchBaseQuery({
        baseUrl: pluginData.api.rest.baseUrl,
    }),
    // tagTypes: [],
    endpoints: (builder) => ({
        getExample: builder.query({
            query: ({ header, description }) => ({
              url: pluginData.api.rest.endpoints.example,
              params: { header, description },
            }),
            // invalidatesTags: [""]
          }),
        postExample: builder.mutation({
            query: ( data : Object ) => ({
                url: pluginData.api.rest.endpoints.example,
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