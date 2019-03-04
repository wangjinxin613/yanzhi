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
		duration: 1000
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
	post:function(e){
		var notice = e.target.dataset.notice;
		app.connect("notice.php",
		{
			notice:notice,
			uid:this.data.userInfo.id
		},function(e){
			app.globalData.userInfo.notice = notice;
			console.log(notice );
		});
		
	},
	onLoad: function () {
		var that = this;
		app.getUserInfo(function (userInfo) {
			//更新数据
			that.setData({
				userInfo: userInfo
			})
			console.log(that.data.userInfo);
		})
	},
	onPullDownRefresh: function () {
		app.login();
		this.onLoad();

		wx.stopPullDownRefresh();
	},
})
