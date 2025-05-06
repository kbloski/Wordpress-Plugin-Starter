import { useEffect, useState } from "react";

function Api() {
  const [data, setData] = useState("");

  useEffect(() => {
    fetch(pluginData.api.endpoints.example + `?header=Kamil&description=Blonski`)
    .then( res => res.json())
    .then( data => setData(JSON.stringify(data)))
  }, [])

  return (
    <div>
      <h1>Test Api</h1>
      <hr />
      <div>Rest full data: { data }.</div>
    </div>
  )
}

export default Api
