<?php

namespace Inc\Templates\Helpers;

class HtmlElementCreator
{
    private const DATA_LOAD_INFO = 'data-load-info-id';
    private const DATA_REACT_ID = 'data-react-id';

    private static function createUniqueDataLoadInfoId() : string
    {
        return uniqid('load-info-', true);
    }

    private static function elScript(string $loadInfoId)
    {
        ob_start(); ?>

        <script>
            window.addEventListener('load', () => {
                const loadContainerInfo = document.querySelector('[<?php echo self::DATA_LOAD_INFO; ?>="<?php echo $loadInfoId; ?>"]');
                if (!loadContainerInfo) return; 

                loadContainerInfo.innerHTML = '';

                // Paragraph
                const pInfo = document.createElement('p');
                pInfo.innerText = "Oops! Something went wrong while loading the component. This component may not be implemented yet. Please try again later.";
                loadContainerInfo.appendChild(pInfo);

                // Button
                const btnRefresh = document.createElement('button');
                btnRefresh.innerText = "Refresh";
                btnRefresh.onclick = () => { location.reload(); };

                loadContainerInfo.appendChild(btnRefresh);
            });
        </script>

        <?php 
        return ob_get_clean();
    }

    public static function createDivWithReactId(string $dataReactId, ?string $customHtmlTemplate = null): string
    {
        $uniqueLoadInfoId = self::createUniqueDataLoadInfoId();

        $code = "<div " . self::DATA_REACT_ID . "='" . htmlspecialchars($dataReactId, ENT_QUOTES, 'UTF-8') . "'>";
        $code .= $customHtmlTemplate ?? " 
            <div style='text-align: center;' " . self::DATA_LOAD_INFO . "='" . $uniqueLoadInfoId . "'>
                Loading application component...
            </div>";
        $code .= self::elScript($uniqueLoadInfoId);
        $code .= "</div>";

        return $code;
    }
}
