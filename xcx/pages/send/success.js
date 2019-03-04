//index.js
//获取应用实例
const app = getApp()

Page({
	data: {
		motto: '赞赏看图',
		userInfo: {},
		hasUserInfo: false,
		canIUse: wx.canIUse('button.open-type.getUserInfo'),
		imgUrls: [
			{ url: 'http://img02.tooopen.com/images/20150928/tooopen_sy_143912755726.jpg', text: '111' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175866434296.jpg', text: '222' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175833047715.jpg', text: '789' }
		],
		isSelect1: 'active',
		isSelect2: '',
		isDisplay1: 'block',
		isDisplay2: 'hidden',
		indicatorDots: false,
		autoplay: false,
		interval: 5000,
		duration: 1000,
		data_list: {},
		lid:'',
		erweima:''
	},
	changeIndicatorDots: function (e) {
		this.setData({
			indicatorDots: !this.data.indicatorDots
		})
	},
	changeAutoplay: function (e) {
		this.setData({
			autoplay: !this.data.autoplay
		})
	},
	intervalChange: function (e) {
		this.setData({
			interval: e.detail.value
		})
	},
	durationChange: function (e) {
		this.setData({
			duration: e.detail.value
		})
	},
	//事件处理函数
	bindViewTap: function () {
		wx.navigateTo({
			url: '../logs/logs'
		})
	},
	//是否显示
	change_vip: function () {
		this.setData({
			isSelect1: 'no',
			isSelect2: 'active',
			isDisplay1: 'hidden',
			isDisplay2: 'block'
		});
	},
	change_index: function () {
		this.setData({
			isSelect1: 'active',
			isSelect2: 'no',
			isDisplay1: 'block',
			isDisplay2: 'hidden'
		});
	},
	zhuanfa:function(){
		console.log("zhuanfa");
		this.onShareAppMessage();
	},
	shoutu: function (e) {
		var urls = new Array();
		urls[0] = e.currentTarget.dataset.src;
		wx.previewImage({
			current: e.currentTarget.dataset.src,
			urls: urls // 需要预览的图片http链接列表
		})
		console.log(urls);
	},
	baocun:function(e){
		var src = e.target.dataset.src;
		wx.downloadFile({
			url: src,
			success: function (res) {
				wx.saveImageToPhotosAlbum({
					filePath: res.tempFilePath,
					success: function (res) {
						wx.showToast({
							title: '二维码保存成功',
							duration: 1500
						})
						setTimeout(function () {
							wx.hideToast()
						}, 2000)
						console.log('保存本地success');
						console.log(res)
					},
					fail: function (res) {
						wx.showToast({
							title: '二维码保存失败',
							duration: 1500
						})
						setTimeout(function () {
							wx.hideToast()
						}, 2000)
						console.log('保存本地fail');
						console.log(res);
					}
				})
			},
			fail: function (res) {
				wx.showToast({
					title: '下载失败' + res,
					duration: 1500
				})
				setTimeout(function () {
					wx.hideToast()
				}, 2000)
				console.log('下载fail');
				console.log(res);
			}
		})  
	},
	onLoad: function (options) {
		var lid = options.lid;//列表id
		var that = this;
		//获取详情信息
		app.getUserInfo(function (userInfo) {
			//更新数据
			that.setData({
				lid:lid,
				userInfo: userInfo
			})
			console.log(app.globalData.token);
			app.connect("getErweima.php",{
				lid:lid,
				token: app.globalData.token
			},function(e){
				that.setData({
					erweima:e
				})
				console.log(e);
			});
		})
		//获取二维码信息
		//需要已发布的小程序才可以生成	
	},
	onShareAppMessage: function (res) {	
		return {
			title: '我发布了一套“私房照”~赶紧点击查看！',
			path: '/pages/reward/index?lid='+this.data.lid,
			imageUrl: 'http://uolol.com/img/zhuanfa.jpg',
			success: function (res) {
				// 转发成功
			},
			fail: function (res) {
				// 转发失败
			}
		}
	}
})
