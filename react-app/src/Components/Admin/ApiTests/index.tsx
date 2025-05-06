import { useGetExampleQuery, usePostExampleMutation } from "../../../Api/example";

function Api() {
  // @ts-ignore
  const { data, error, isLoading, refetch } = useGetExampleQuery({
    header: "Header #1",
    description: "Description #1"
  });

  const [postExample, {isLoading : isLoadingPE, data : dataPe}] = usePostExampleMutation();

  function postData(){
    postExample({
      header: "Post Header #1",
      description: "Post Description #1"
    })
  }

  return (
    <div>
      <h1>Test Api</h1>
      <hr />
      <h2>
        <button onClick={refetch}>Test</button> [GET] example
      </h2>
      { isLoading ? "Loading..." : <div>{JSON.stringify(data)}</div>}
      <h2><button onClick={postData}>Test</button> [POST] example</h2>
      { isLoadingPE ? "Loading..." : <div>{JSON.stringify(dataPe)}</div>}
    </div>
  )
}

export default Api
