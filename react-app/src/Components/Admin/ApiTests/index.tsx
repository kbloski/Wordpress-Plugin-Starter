import { useEffect, useState } from "react";

declare const pluginData: {
  ajaxUrl: string;
  nonce: string;
  restBaseUrl : string;
  restUrlGetName : string;
  [key: string]: any;
};

function Api() {
  const [fullname, setFullname] = useState("");

  useEffect(() => {
    fetch(pluginData.restUrlGetName + `?name=Kamil&surname=Blonski`)
    .then( res => res.json())
    .then( data => setFullname(`${data.name} ${data.surname}`))
  }, [])

  return (
    <div>
      <div>
        Hello from react app
      </div>
      <div>
        <strong>pluginData</strong>
        <pre>
          { JSON.stringify(pluginData) }
        </pre>
      </div>
      <div>Rest full name: { fullname }.</div>
    </div>
  )
}

export default Api
