# Wieni Module Webform Simplifier

## About

Small module to modify webform administration to clean up and hide the ugly parts from non advanced users. This includes but is not limited to:

- CSS
- Javascript
- YML

This module also provides a small twig extension to display a webform in the twig file.

```
{{ paragraph.getWebform()|webform }}
```

Ideally you need to create the paragraph bundle and the model function getWebform.
