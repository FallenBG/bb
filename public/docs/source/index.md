---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_b8dc05d6f509d0ebfee1b9ecb497dd5d -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/mail" 
```

```javascript
const url = new URL("/telescope/telescope-api/mail");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/mail`


<!-- END_b8dc05d6f509d0ebfee1b9ecb497dd5d -->

<!-- START_46cef718b6543d87392ef9d885c32074 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/mail/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/mail/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/mail/{telescopeEntryId}`


<!-- END_46cef718b6543d87392ef9d885c32074 -->

<!-- START_f437131ff649585d9e9028707aff6586 -->
## Get the HTML content of the given email.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/mail/1/preview" 
```

```javascript
const url = new URL("/telescope/telescope-api/mail/1/preview");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/mail/{telescopeEntryId}/preview`


<!-- END_f437131ff649585d9e9028707aff6586 -->

<!-- START_e78ffa4a993bd280d8bbcfeece76333c -->
## Download the Eml content of the email.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/mail/1/download" 
```

```javascript
const url = new URL("/telescope/telescope-api/mail/1/download");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/mail/{telescopeEntryId}/download`


<!-- END_e78ffa4a993bd280d8bbcfeece76333c -->

<!-- START_6d8be72a837a4251b2068584bf71a0da -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/exceptions" 
```

```javascript
const url = new URL("/telescope/telescope-api/exceptions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/exceptions`


<!-- END_6d8be72a837a4251b2068584bf71a0da -->

<!-- START_28f8ee28d6619d49fbc6f1e955d34728 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/exceptions/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/exceptions/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/exceptions/{telescopeEntryId}`


<!-- END_28f8ee28d6619d49fbc6f1e955d34728 -->

<!-- START_e08a570bb93827d8b6603d1fb9f2b93d -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/dumps" 
```

```javascript
const url = new URL("/telescope/telescope-api/dumps");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/dumps`


<!-- END_e08a570bb93827d8b6603d1fb9f2b93d -->

<!-- START_eab4e91ba32edb6580a8ed2632fca255 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/logs" 
```

```javascript
const url = new URL("/telescope/telescope-api/logs");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/logs`


<!-- END_eab4e91ba32edb6580a8ed2632fca255 -->

<!-- START_2a59c20c5796d5d492133c3e8bcd1d34 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/logs/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/logs/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/logs/{telescopeEntryId}`


<!-- END_2a59c20c5796d5d492133c3e8bcd1d34 -->

<!-- START_4ef84633ff5ac0c8df8f542d6d19a6d8 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/notifications" 
```

```javascript
const url = new URL("/telescope/telescope-api/notifications");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/notifications`


<!-- END_4ef84633ff5ac0c8df8f542d6d19a6d8 -->

<!-- START_6395c2300a578d2ff312b0a7381521d3 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/notifications/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/notifications/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/notifications/{telescopeEntryId}`


<!-- END_6395c2300a578d2ff312b0a7381521d3 -->

<!-- START_9efcd66e514d1f19224e0b2e27468db9 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/jobs" 
```

```javascript
const url = new URL("/telescope/telescope-api/jobs");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/jobs`


<!-- END_9efcd66e514d1f19224e0b2e27468db9 -->

<!-- START_d61020a49164fb68d91b4970072570bc -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/jobs/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/jobs/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/jobs/{telescopeEntryId}`


<!-- END_d61020a49164fb68d91b4970072570bc -->

<!-- START_15f74a948a5d813e235ca5d2ff32c892 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/events" 
```

```javascript
const url = new URL("/telescope/telescope-api/events");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/events`


<!-- END_15f74a948a5d813e235ca5d2ff32c892 -->

<!-- START_cb367d2f23d97116a97d78faaae81e1f -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/events/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/events/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/events/{telescopeEntryId}`


<!-- END_cb367d2f23d97116a97d78faaae81e1f -->

<!-- START_7ec6f1ddc70142ea1f60a799307f4f4a -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/gates" 
```

```javascript
const url = new URL("/telescope/telescope-api/gates");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/gates`


<!-- END_7ec6f1ddc70142ea1f60a799307f4f4a -->

<!-- START_f7261ef8c2d8def355b1be63596b9455 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/gates/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/gates/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/gates/{telescopeEntryId}`


<!-- END_f7261ef8c2d8def355b1be63596b9455 -->

<!-- START_104836e7045badb7761960560308f50c -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/cache" 
```

```javascript
const url = new URL("/telescope/telescope-api/cache");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/cache`


<!-- END_104836e7045badb7761960560308f50c -->

<!-- START_a9794a212e7bc0d3bf15e26acdf7685e -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/cache/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/cache/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/cache/{telescopeEntryId}`


<!-- END_a9794a212e7bc0d3bf15e26acdf7685e -->

<!-- START_f5bd8c7cfbf94e2facea5e422716e828 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/queries" 
```

```javascript
const url = new URL("/telescope/telescope-api/queries");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/queries`


<!-- END_f5bd8c7cfbf94e2facea5e422716e828 -->

<!-- START_126e06b566849f9991002afb0b34dd11 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/queries/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/queries/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/queries/{telescopeEntryId}`


<!-- END_126e06b566849f9991002afb0b34dd11 -->

<!-- START_2a0be87abbf498979bd57a79b0dbf8f5 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/models" 
```

```javascript
const url = new URL("/telescope/telescope-api/models");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/models`


<!-- END_2a0be87abbf498979bd57a79b0dbf8f5 -->

<!-- START_b9f7de78bc63ac228648c9086ebad48c -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/models/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/models/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/models/{telescopeEntryId}`


<!-- END_b9f7de78bc63ac228648c9086ebad48c -->

<!-- START_07a4603df131c6daad826b2f7f2b009c -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/requests" 
```

```javascript
const url = new URL("/telescope/telescope-api/requests");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/requests`


<!-- END_07a4603df131c6daad826b2f7f2b009c -->

<!-- START_deedcbe0d49ee78b6b0211b6382a6ad3 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/requests/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/requests/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/requests/{telescopeEntryId}`


<!-- END_deedcbe0d49ee78b6b0211b6382a6ad3 -->

<!-- START_1b00812e02a8ebcab44bee37f710e21a -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/commands" 
```

```javascript
const url = new URL("/telescope/telescope-api/commands");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/commands`


<!-- END_1b00812e02a8ebcab44bee37f710e21a -->

<!-- START_630361bcb61ef50767ab0e87078233ed -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/commands/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/commands/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/commands/{telescopeEntryId}`


<!-- END_630361bcb61ef50767ab0e87078233ed -->

<!-- START_98a5c94ff64c824fc9202e5025af17b8 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/schedule" 
```

```javascript
const url = new URL("/telescope/telescope-api/schedule");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/schedule`


<!-- END_98a5c94ff64c824fc9202e5025af17b8 -->

<!-- START_1411a7b24b36bd9e8208b47212d346e4 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/schedule/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/schedule/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/schedule/{telescopeEntryId}`


<!-- END_1411a7b24b36bd9e8208b47212d346e4 -->

<!-- START_f25acbb3e06a57e8411a14e4694c75fb -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/redis" 
```

```javascript
const url = new URL("/telescope/telescope-api/redis");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/redis`


<!-- END_f25acbb3e06a57e8411a14e4694c75fb -->

<!-- START_3670bdc683457b53a7c2b118c10905d0 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/redis/1" 
```

```javascript
const url = new URL("/telescope/telescope-api/redis/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/redis/{telescopeEntryId}`


<!-- END_3670bdc683457b53a7c2b118c10905d0 -->

<!-- START_af458f9f0b35f66bde272f4b973c6637 -->
## Get all of the tags being monitored.

> Example request:

```bash
curl -X GET -G "/telescope/telescope-api/monitored-tags" 
```

```javascript
const url = new URL("/telescope/telescope-api/monitored-tags");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "tags": []
}
```

### HTTP Request
`GET telescope/telescope-api/monitored-tags`


<!-- END_af458f9f0b35f66bde272f4b973c6637 -->

<!-- START_b7f76aeac39a9c3f089e2da6d4b6b38a -->
## Begin monitoring the given tag.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/monitored-tags" 
```

```javascript
const url = new URL("/telescope/telescope-api/monitored-tags");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/monitored-tags`


<!-- END_b7f76aeac39a9c3f089e2da6d4b6b38a -->

<!-- START_bdcab0f8e9b0350c8661f5c890333e8a -->
## Stop monitoring the given tag.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/monitored-tags/delete" 
```

```javascript
const url = new URL("/telescope/telescope-api/monitored-tags/delete");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/monitored-tags/delete`


<!-- END_bdcab0f8e9b0350c8661f5c890333e8a -->

<!-- START_420018fbba86099da7b9c8db6d9bdc8d -->
## Toggle recording.

> Example request:

```bash
curl -X POST "/telescope/telescope-api/toggle-recording" 
```

```javascript
const url = new URL("/telescope/telescope-api/toggle-recording");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST telescope/telescope-api/toggle-recording`


<!-- END_420018fbba86099da7b9c8db6d9bdc8d -->

<!-- START_4030988e35daa5fb1ec401a4d536dc96 -->
## Display the Telescope view.

> Example request:

```bash
curl -X GET -G "/telescope/1" 
```

```javascript
const url = new URL("/telescope/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET telescope/{view?}`


<!-- END_4030988e35daa5fb1ec401a4d536dc96 -->

<!-- START_ba05cb3a11667fbd2926fcfc72905d8a -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "/projects" 
```

```javascript
const url = new URL("/projects");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects`


<!-- END_ba05cb3a11667fbd2926fcfc72905d8a -->

<!-- START_8f546be87408a19565ba4bfccdb9bc46 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "/projects/create" 
```

```javascript
const url = new URL("/projects/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/create`


<!-- END_8f546be87408a19565ba4bfccdb9bc46 -->

<!-- START_727ac48f472e63deb2c290aa7e3b4d4f -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "/projects/1/update" 
```

```javascript
const url = new URL("/projects/1/update");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/{project}/update`


<!-- END_727ac48f472e63deb2c290aa7e3b4d4f -->

<!-- START_559ca32d29b9eee92470ea6238f2e491 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "/projects/1" 
```

```javascript
const url = new URL("/projects/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/{project}`


<!-- END_559ca32d29b9eee92470ea6238f2e491 -->

<!-- START_6457c064807333898638aaa8f41ba1ab -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "/projects" 
```

```javascript
const url = new URL("/projects");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST projects`


<!-- END_6457c064807333898638aaa8f41ba1ab -->

<!-- START_e1885fcd772bd7cddaa44321ad44d63d -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PATCH "/projects/1/update" 
```

```javascript
const url = new URL("/projects/1/update");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PATCH",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PATCH projects/{project}/update`


<!-- END_e1885fcd772bd7cddaa44321ad44d63d -->

<!-- START_f475adb2ac5e6add3bf387ef772888ab -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "/projects/1/tasks" 
```

```javascript
const url = new URL("/projects/1/tasks");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST projects/{project}/tasks`


<!-- END_f475adb2ac5e6add3bf387ef772888ab -->

<!-- START_ff98fc184ef837b52099ea86e011ee5a -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PATCH "/projects/1/tasks/1" 
```

```javascript
const url = new URL("/projects/1/tasks/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PATCH",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PATCH projects/{project}/tasks/{task}`


<!-- END_ff98fc184ef837b52099ea86e011ee5a -->

<!-- START_99d620d962db1959ed0be5513cecbb8d -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X GET -G "/projects/1/note" 
```

```javascript
const url = new URL("/projects/1/note");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/{project}/note`


<!-- END_99d620d962db1959ed0be5513cecbb8d -->

<!-- START_aad6a90e3dee775d4ee8a9e12dc20c93 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PATCH "/projects/1/note/1" 
```

```javascript
const url = new URL("/projects/1/note/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PATCH",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PATCH projects/{project}/note/{note}`


<!-- END_aad6a90e3dee775d4ee8a9e12dc20c93 -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET -G "/home" 
```

```javascript
const url = new URL("/home");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET -G "/login" 
```

```javascript
const url = new URL("/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST "/login" 
```

```javascript
const url = new URL("/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST "/logout" 
```

```javascript
const url = new URL("/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET -G "/register" 
```

```javascript
const url = new URL("/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST "/register" 
```

```javascript
const url = new URL("/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET -G "/password/reset" 
```

```javascript
const url = new URL("/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "/password/email" 
```

```javascript
const url = new URL("/password/email");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET -G "/password/reset/1" 
```

```javascript
const url = new URL("/password/reset/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "/password/reset" 
```

```javascript
const url = new URL("/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->


