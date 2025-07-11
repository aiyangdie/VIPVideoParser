# VIPVideoParser

<div align="center">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5"/>
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3"/>
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript"/>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP"/>
  <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License: MIT"/>
</div>

<div align="center">
  <h3>一个简单的视频解析网站，可以解析各大视频平台的VIP视频</h3>
  <h3>A simple video parsing website that can parse VIP videos from major platforms</h3>
</div>

## 📋 目录 | Contents

- [功能特点 | Features](#-功能特点--features)
- [使用方法 | How to Use](#-使用方法--how-to-use)
- [支持的视频网站 | Supported Video Websites](#-支持的视频网站--supported-video-websites)
- [解析接口 | Parsing Interfaces](#-解析接口--parsing-interfaces)
- [注意事项 | Notes](#-注意事项--notes)
- [技术栈 | Tech Stack](#-技术栈--tech-stack)
- [部署说明 | Deployment Instructions](#-部署说明--deployment-instructions)
- [许可证 | License](#-许可证--license)

## 🚀 功能特点 | Features

- 支持多个视频解析接口
- 响应式设计，适配各种设备
- 提供纯HTML/CSS/JS版本和PHP版本
- 自动尝试读取剪贴板中的视频链接
- 简洁美观的用户界面

<details>
<summary>English</summary>

- Support for multiple video parsing interfaces
- Responsive design, compatible with various devices
- Available in pure HTML/CSS/JS version and PHP version
- Automatically attempts to read video links from clipboard
- Clean and attractive user interface
</details>

## 📝 使用方法 | How to Use

### HTML版本 | HTML Version

1. 下载所有文件（index.html, style.css, script.js）
2. 使用浏览器直接打开index.html文件
3. 输入要解析的视频链接，选择解析线路，点击"解析"按钮

<details>
<summary>English</summary>

1. Download all files (index.html, style.css, script.js)
2. Open index.html directly in your browser
3. Enter the video link you want to parse, select a parsing route, and click the "Parse" button
</details>

### PHP版本 | PHP Version

1. 下载所有文件（index.php, style.css）
2. 将文件上传到支持PHP的Web服务器
3. 访问index.php页面
4. 输入要解析的视频链接，选择解析线路，点击"解析"按钮

<details>
<summary>English</summary>

1. Download all files (index.php, style.css)
2. Upload the files to a PHP-enabled web server
3. Visit the index.php page
4. Enter the video link you want to parse, select a parsing route, and click the "Parse" button
</details>

## 📺 支持的视频网站 | Supported Video Websites

<table>
  <tr>
    <td>爱奇艺 (iQiyi)</td>
    <td>腾讯视频 (Tencent Video)</td>
    <td>优酷 (Youku)</td>
  </tr>
  <tr>
    <td>芒果TV (Mango TV)</td>
    <td>bilibili</td>
    <td>搜狐视频 (Sohu Video)</td>
  </tr>
  <tr>
    <td>PPTV</td>
    <td>乐视视频 (LeTV)</td>
    <td>等其他主流视频网站 (And other mainstream video websites)</td>
  </tr>
</table>

## 🔗 解析接口 | Parsing Interfaces

本站使用以下解析接口 | This site uses the following parsing interfaces:

1. 线路一 (Route 1): `https://jx.xmflv.cc/?url=`
2. 线路二 (Route 2): `http://v9j.net/?url=`

## ⚠️ 注意事项 | Notes

- 本站仅供学习交流使用，请勿用于商业用途
- 请遵守相关法律法规，尊重版权
- 如有侵权，请联系删除

<details>
<summary>English</summary>

- This site is for learning and communication purposes only, not for commercial use
- Please comply with relevant laws and regulations, respect copyright
- If there is any infringement, please contact us for removal
</details>

## 💻 技术栈 | Tech Stack

- HTML5
- CSS3
- JavaScript
- PHP (可选 | optional)

## 🚀 部署说明 | Deployment Instructions

### 静态部署 | Static Deployment (HTML Version)

可以部署在任何静态网站托管服务上，如GitHub Pages、Netlify等。

<details>
<summary>English</summary>

Can be deployed on any static website hosting service, such as GitHub Pages, Netlify, etc.
</details>

### 动态部署 | Dynamic Deployment (PHP Version)

需要部署在支持PHP的Web服务器上，如Apache、Nginx+PHP-FPM等。

<details>
<summary>English</summary>

Needs to be deployed on a PHP-enabled web server, such as Apache, Nginx+PHP-FPM, etc.
</details>

## 📄 许可证 | License

[MIT License](LICENSE) 