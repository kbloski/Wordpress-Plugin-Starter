import { useEffect, useState } from "react";

function Api() {
  const [fullname, setFullname] = useState("");

  useEffect(() => {
    fetch(pluginData.api.endpoints.getName + `?name=Kamil&surname=Blonski`)
    .then( res => res.json())
    .then( data => setFullname(`${data.name} ${data.surname}`))
  }, [])

  return (
    <div>
      <h1>Test Api</h1>
      <hr />
      <div>Rest full name: { fullname }.</div>
    </div>
  )
}

export default Api
