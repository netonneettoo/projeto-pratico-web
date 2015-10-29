Headings
# This is an H1
## This is an H2
###### This is an H6



Paragraphs
Each paragraph begins on a new line. Simply press <return> for a new line.

For example,  
like this.

You'll need an empty line between a paragraph and any following markdown construct, 
such as an ordered or unordered list, for that to be rendered. Like this:

* Item 1
* Item 2



Character styles
*Italic characters* 
_Italic characters_
**bold characters**
__bold characters__
~~strikethrough text~~



Unordered list
* Item 1
* Item 2
* Item 3
    * Item 3a
    * Item 3b
    * Item 3c



Ordered list
1. Step 1
2. Step 2
3. Step 3
    a. Step 3a
    b. Step 3b
    c. Step 3c



List in list
1. Step 1
2. Step 2
3. Step 3
    * Item 3a
    * Item 3b
    * Item 3c



Quotes or citations
Introducing my quote:
 
> Neque porro quisquam est qui 
> dolorem ipsum quia dolor sit amet, 
> consectetur, adipisci velit...



Inline code characters
Use the backtick to refer to a `function()`.
 
There is a literal ``backtick (`)`` here.



Code blocks
Indent every line of the block by at least 4 spaces or 1 tab. 
 
This is a normal paragraph:
 
    This is a code block.
    With multiple lines.

Alternatively, you can use 3 backtick quote marks before and after the block, like this:

```
This is a code block
```
 
To add syntax highlighting to a code block, add the name of the language immediately
after the backticks: 
 
```javascript
var oldUnload = window.onbeforeunload;
window.onbeforeunload = function() {
    saveCoverage();
    if (oldUnload) {
        return oldUnload.apply(this, arguments);
    }
};
```



Links to external websites
This is [an example](http://www.slate.com/ "Title") inline link.

[This link](http://example.net/) has no title attribute.



Linking issue keys to JIRA
When you use JIRA issue keys (of the default format) in comments and pull request descriptions Stash automatically links them to the JIRA instance.
The default JIRA issue key format is two or more uppercase letters ([A-Z][A-Z]+), followed by a hyphen and the issue number, for example STASH-123.


[Alt text image](http://lorempixel.com/400/250/people/1/ "Optional title attribute")


Images
![Alt text](http://lorempixel.com/400/250/people/2/)
![Alt text](http://lorempixel.com/400/250/people/3/ "Optional title attribute")


Tables
| First Header  | Second Header |
| ------------- | ------------- |
| Content Cell  | Content Cell  |
| Content Cell  | Content Cell  |



