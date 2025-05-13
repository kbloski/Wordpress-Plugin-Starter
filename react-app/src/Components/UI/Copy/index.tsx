import style from "./Copy.module.scss";
import { useState } from "react";

import { CopyInterface } from "./interfaces";

function Copy( { text } : CopyInterface )
{   
    const [isCopied, setIsCopied] = useState(false);
    const timeOutIcon = 3000;

    function onCopyClick()
    {
        navigator.clipboard.writeText(text).then(() => setIsCopied(true));

        setTimeout(() => setIsCopied(false), timeOutIcon)
    }

    if (!isCopied) return <i className={`pi pi-clone ${style.icon}`} onClick={onCopyClick}></i>
    return <i className={`pi pi-check ${style.icon}`} onClick={onCopyClick}></i>
}

export default Copy;