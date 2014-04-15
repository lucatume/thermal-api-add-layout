# Thermal API template information addon

Adds the template information to the JSON response.

## Installing
Download the zip and copy the folder to WordPress plugins folder.

## Using
Just make some GET requests and the information about the template will be returned in the JSON file.  
The plugin comes with no settings and requires no configuration aside for the active [Thermal API](http://thermal-api.com/) plugin.

## Response
The template information will be stored in the <code>template</code> key; if the default template is being used then <code>default</code> will be returned.  
If another template is in use then the path of the template file will be returned: the template file <code>templates/someTemplate.php</code> will return <code>someTemplate</code>.