<div style="text-align:center"><img src="https://avatars1.githubusercontent.com/u/19998610?s=400&u=b0b43ea9e0f7ab15a20421ff6c44988ea8021645&v=4" /></div>

Elements Parser
======================

Elements Parser is a small PHP package that reads files and tries to recreate their structure output into HTML.

The idea came with the necessity to quickly deploy something that allowed me to pass on a file with contents 
(In my case was terms and conditions) which such file could be quickly translated. The project at hands didn't have a dashboard
and I didn't think a full on PHP file returning an array of translatable terms and conditions was the way to go.

Though it was easier to have specific language files already translated and that could easily be send over to anybody for
them to do the translations and them easily attach them to the server again without having to push code for changes.

# Installation 

```bash
composer require legiaifenix/json-elements-parser
``` 

## Supported File types

The only supported file for the time being is `JSON`. Depending of necessity/popularity, more can be implemented, although
the priority probably would be turned towards allowing specific __style, class and ID adherence__.

## Usage

1. First identify the path and file of the `JSON` file type you wish to use (E.g:. `public/files/drawables/en.json`);
2. Call the `factory` and pass in your path:
    ```php
    use legiaifenix\jsonParser\Factories\ElementsBuilderFactory;
    
       ...
    
    $builder = ElementsBuilderFactory::create($filePath);
    ```
3. Whenever you wish, you can ask the builder to, well, build up from your file. 
When  `build()` is called, the builder uses the entire content from the file and loops through it to understand which
types of elements it should be drawing.
    ```php
    $builder->build();
    ```

4. Draw the entirety of the content as `HTML` by calling
    ```php
    $builder->draw();
    ```
   
# Exceptions

| Exception | Generated By   | Why it occurs?   |
|:---------:|:--------------:|----------------|
| FileDoesNotExistException | Files | The factory was not able to locate the file from the path and filename you passed as parameter |
| FileDoesNotHaveExtension | Files | The package does not understand how to use files like `test` or `another-example`. It will try to find a file type, such as `test.json` or `an-example.md` |
| ClassNotSupportedException | Builder | When you pass a file to the package, it will try and call the correct builder. So if you pass `test.json` it will try and initiate a JSON builder. In this case it means you tried to pass a file type which have no builder type yet (if in version 1, anything other than a `JSON` will generate this exception) |

# What can the package draw as HTML?

__Titles__
```json
{
  "title": "My first test"
}
```

Output
```html
<h1>My first test</h1>
```

__Paragraph__
```json
{
  "Not informing a type defaults into paragraphs"
}
```

Output
```html
<p>Not informing a type defaults into paragraphs</p>
```

__Logical structures__
```json
[
    "My first paragraph!",
    {
        "title": "My main title",
        "content": [
          "This is the first paragraph of my main title",
          "This follows the first paragraph as its second",
          "Can carry on adding paragraphs"
        ]
    }
]
```

Output
```html
<p>My first paragraph!</p>
<h1>My main title</h1>
<p>This is the first paragraph of my main title</p>
<p>This follows the first paragraph as its second</p>
<p>Can carry on adding paragraphs</p>
```


