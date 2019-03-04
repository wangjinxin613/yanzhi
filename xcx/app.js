//app.js
App({
	onLaunch: function () {
		//调用API从本地缓存中获取数据
		var logs = wx.getStorageSync('logs') || []
		logs.unshift(Date.now())
		wx.setStorageSync('logs', logs);
		this.login();
		this.getUserInfo();
		this.getToken();
	},
	getUserInfo: function (cb) {
		var that = this
		if (this.globalData.userInfo) {
			typeof cb == "function" && cb(this.globalData.userInfo)
		} else {
			//调用登录接口
			var utoken = wx.getStorageSync("utoken");
			wx.login({
				success: function (loginCode) {
					var code = loginCode.code;
					wx.getUserInfo({
						success: function (res) {
					
							that.connect("userLogin.php", {
								utoken: utoken,
								code: code,
								encryptedData: res.encryptedData,
								iv: res.iv
							}, function (res) {
								that.globalData.userInfo = res;
								typeof cb == "function" && cb(that.globalData.userInfo)
								//	that.globalData.userInfo.money = res.money;
									console.log(res);
								//console.log(that.globalData.userInfo);
							});
						}
					})
					
				}

			})
		}
	},
	//批量上传图片函数
	uploadimg: function (data) {
		var that = this,
			i = data.i ? data.i : 0,
			success = data.success ? data.success : 0,
			fail = data.fail ? data.fail : 0;
		const uploadTask = wx.uploadFile({
			url: data.url,
			filePath: data.path[i],
			name: 'sendImg',
			formData: { uid: that.globalData.userInfo.id, l_id: data.l_id, url: that.globalData.url },
			success: (resp) => {
				success++;
				console.log(resp)
				console.log(i);
				//这里可能有BUG，失败也会执行这里
			},
			fail: (res) => {
				fail++;
				console.log('fail:' + i + "fail:" + fail);
			},
			complete: () => {
				console.log(i);
				i++;
				if (i == data.path.length) {  //当图片传完时，停止调用    
					console.log('执行完毕');
					console.log('成功：' + success + " 失败：" + fail);
				} else {//若图片还没有传完，则继续调用函数
					console.log(i);
					data.i = i;
					data.success = success;
					data.fail = fail;
					that.uploadimg(data);
				}

			}
		});
		uploadTask.onProgressUpdate((res) => {
			console.log('上传进度', res.progress)
			console.log('已经上传的数据长度', res.totalBytesSent)
			console.log('预期需要上传的数据总长度', res.totalBytesExpectedToSend)
		})

	},
	login: function (cb) {
		//调用微信登录接口  
		var that = this;
		var utoken = wx.getStorageSync("utoken");
		wx.login({
			success: function (loginCode) {

				var code = loginCode.code;

				wx.getUserInfo({
					success: function (res) {
						that.connect("userLogin.php", {
							utoken: utoken,
							code: code,
							encryptedData: res.encryptedData,
							iv: res.iv
						}, function (res) {
							that.globalData.userInfo = res;
							//	that.globalData.userInfo.money = res.money;
							//	console.log(res);
							//console.log(that.globalData.userInfo);
						});
					}
				})
			}
		})

	},
	globalData: {
		url: 'https://uolol.com',
		userInfo: null,
		openid: null,
		shop: null,
		token: ''
	},
	//參數分別是 地址，傳入參數，成功后執行函數
	connect: function (url, parameter, callback) {
		wx.request({
			url: "https://uolol.com/api/" + url, //仅为示例，并非真实的接口地址
			data: parameter,
			dataType: 'json',
			method: "POST",
			header: {
				'content-type': 'application/x-www-form-urlencoded'
			},
			success: function (res) {
				callback(res.data);
				//console.log(res.data);
			}
		})

	},
	//获取access_token
	getToken: function () {
		var that = this;
		that.connect("getToken.php", "", function (e) {
			console.log(e);
			that.globalData.token = e;
		});
	}

})