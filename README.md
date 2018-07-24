# Sprout Encode Email

Encode the email addresses in your templates so they can't be harvested by evil spam bots.

## Usage

The `rot13` filter (and the easier to remember `encode` filter) encode the string you pass to them using the Rot13 cipher and return a javascript tag to decode the string on the page.

``` twig
{% set email = "<a href='mailto:you@example.com'>Your Name</a>" %}

{{ email | encode }}
{{ email | rot13 }}
```

The `entities` filter encodes your content into HTML Entities.

``` twig
<a href='{{ "mailto:you@example.com" | entities }}'>Your Name</a>
```

## Documentation

See the [Sprout Website](https://sprout.barrelstrengthdesign.com/craft-plugins/encode-email/docs) for documentation, guides, and additional resources. 

## Support

- [Send a Support Ticket](https://sprout.barrelstrengthdesign.com/craft-plugins/request/support) via the Sprout Website.
- [Create an issue](https://github.com/barrelstrength/craft-sprout-encode-email/issues) on Github.

<a href="https://sprout.barrelstrengthdesign.com" target="_blank">
  <img src="https://s3.amazonaws.com/sprout.barrelstrengthdesign.com-assets/content/plugins/sprout-icon.svg" width="72" align="right">
</a>