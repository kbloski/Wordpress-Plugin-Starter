declare const pluginData: {
    config: {
      pluginPrefix : string;
    },
    api : {
      restBaseUrl: string;
      endpoints: Record<string, string>;
      nonce: string;
    },
    admin : {
      shortcodes : {
        php : string[],
        react: string[]
      }
    }

};
  